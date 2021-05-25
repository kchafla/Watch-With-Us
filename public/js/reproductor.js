var key = ""; // INSERTAR CLAVE DE API PROPORCIONADA POR GOOGLE CLOUD //

// CREAR EL REPRODUCTOR DE VIDEOS //
let tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
let firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

let player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('reproductor', {
        height: '480',
        width: '960',
        playerVars: {
            'rel': 0,
            'hl': 'es',
            'modestbranding': 1
        },
        videoId: $("meta[name='lastvideo']").attr("content"),
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

function onPlayerReady(event) {
    Echo.private($("meta[name='room']").attr("content"))
    .listen('NewVideoNotification', (e) => {
        event.target.loadVideoById(e.video.link, 0, "default");
        AddVideo(e.video, e.user);
    })
    .listenForWhisper('activar', (e) => {
        event.target.playVideo();
    })
    .listenForWhisper('pausar', (e) => {
        event.target.pauseVideo();
    })
    .listenForWhisper('tiempo', (e) => {
        event.target.seekTo(e.tiempo);
    });
}

let done = false;
function onPlayerStateChange(event) {
    // REPRODUCTOR ACTIVADO //
    if (event.data == YT.PlayerState.PLAYING) {
        Echo.private($("meta[name='room']").attr("content"))
        .whisper('activar', {
            texto: "YT.PlayerState.PLAYING"
        });
    }
    // REPRODUCTOR EN PAUSA //
    if (event.data == YT.PlayerState.PAUSED) {
        Echo.private($("meta[name='room']").attr("content"))
        .whisper('pausar', {
            texto: "YT.PlayerState.PAUSED"
        });
    }
    // CAMBIAR EL TIEMPO DEL REPRODUCTOR //
    if (event.data == YT.PlayerState.BUFFERING) {
        Echo.private($("meta[name='room']").attr("content"))
        .whisper('tiempo', {
            texto: "YT.PlayerState.BUFFERING",
            tiempo: event.target.getCurrentTime()
        });
    }
    if (event.data == YT.PlayerState.PLAYING && !done) {
        done = true;
    }
}

// BUSCADOR DE VIDEOS //
let $formulario = $("#buscar_form");

$formulario.submit(function( event ) {
    event.preventDefault(); 
    
    let nom = $formulario.children().children().children("#buscar_nom").val();

    fetch("https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=20&type=video&key=" + key + "&q=" + nom)
    .then(response => response.json())
    .then(function(videos) {
        $("#videos").text("");

        let $row = $("<div>").attr("class", "row p-2");
        videos.items.forEach((video, index) => {
            if (index % 4 == 0 && index != 0) {
                $("#videos").append($row);
                $row = $("<div>").attr("class", "row p-2");
            }

            let $carta = $("<div>").attr("class", "col-md-3 p-2");
            let $imagen = $("<img>").attr("src", video.snippet.thumbnails.medium.url).attr("id", video.id.videoId).attr("alt", video.snippet.title).attr("class", "videoimg img-fluid");

            $imagen.click(function() {
                $.post($("meta[name='newvideo']").attr("content"), { _token: $("meta[name='csrf-token']").attr("content"), link: $(this).attr("id"), title: $(this).attr("alt") });
            });

            $row.append($carta.append($("<div>").attr("class", "border border-white bg-dark rounded h-100").append($imagen).append($("<p>").text(he.decode(video.snippet.title)).attr("class", "p-2 cartatexto").attr("title", he.decode(video.snippet.title)))));
        });
    });
});

function AddVideo(video, user) {
    $li = $("<li>").attr("class", "list-group-item");
    $img = $("<img>").attr("src", "https://img.youtube.com/vi/" + video.link + "/0.jpg").attr("id", video.link).attr("alt", video.title).attr("class", "videoimg img-fluid");
    $img.click(function() {
        $.post($("meta[name='newvideo']").attr("content"), { _token: $("meta[name='csrf-token']").attr("content"), link: $(this).attr("id"), title: $(this).attr("alt") });
    });

    $title = $("<p>").text(video.title).attr("class", "m-0 mb-2 text-truncate").attr("title", video.title);
    $date = $("<p>").text(video.created_at.substring(0, 10) + " " + video.created_at.substring(11, 19)).attr("class", "direct-chat-timestamp m-0").attr("style", "font-size: 12px;");
    $user = $("<p>").text(user.name).attr("class", "direct-chat-name m-0").attr("style", "font-size: 12px;");

    $row = $("<div>").attr("class", "row");

    $row.append($("<div>").attr("class", "col-4 p-1").append($img));
    $row.append($("<div>").attr("class", "col-8").append($title).append($date).append($user));
    
    $("#historial").prepend($li.append($row));
}


// RECUPERAR VIDEOS //
fetch($("meta[name='allvideos']").attr("content"))
    .then(response => response.json())
    .then(function(videos) {
        videos["videos"].forEach(function(video, index) {
            AddVideo(video, videos["users"][index]);
        });
});

$("#video_content").hide();
$("#participants_content").hide();

$("#ir_chat").click(function() {
    $(".mostrando").slideUp(500, function() {
        $("#video_content").attr("class", "");
        $("#participants_content").attr("class", "");
        
        $("#box-title").text("Chat");
        $("#chat_content").slideDown(500);
        $("#chat_content").attr("class", "mostrando");
    });
});

$("#ir_historial").click(function() {
    $(".mostrando").slideUp(500, function() {
        $("#chat_content").attr("class", "");
        $("#participants_content").attr("class", "");

        $("#box-title").text("Historial");
        $("#video_content").slideDown(500);
        $("#video_content").attr("class", "mostrando");
    });
});

$("#ir_participantes").click(function() {
    $(".mostrando").slideUp(500, function() {
        $("#chat_content").attr("class", "");
        $("#video_content").attr("class", "");
        
        $("#box-title").text("Participantes");
        $("#participants_content").slideDown(500);
        $("#participants_content").attr("class", "mostrando");
    });
});
