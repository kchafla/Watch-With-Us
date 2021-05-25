<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-secondary backgroundGrey">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-dark text-light shadow-md overflow-hidden sm:rounded-lg backgrounDark">
        {{ $slot }}
    </div>
</div>
