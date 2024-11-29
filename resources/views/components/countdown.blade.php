<div class="flex items-center justify-center rounded-2xl pb-10" x-data="countdown" x-init="start()">
    <div class="text-white w-full max-w-5xl">
        <div class="text-2xl sm:text-4xl md:text-6xl text-center flex flex-wrap w-full items-center justify-center gap-4">

            <!-- Giorni -->
            <div class="w-20 sm:w-24 md:w-32 mx-1 sm:mx-2 p-3 sm:p-4 bg-white text-black rounded-lg">
                <div class="font-mono leading-none" x-text="days">00</div>
                <div class="font-mono uppercase text-sm sm:text-lg leading-none">Giorni</div>
            </div>

            <!-- Ore -->
            <div class="w-20 sm:w-24 md:w-32 mx-1 sm:mx-2 p-3 sm:p-4 bg-white text-black rounded-lg">
                <div class="font-mono leading-none" x-text="hours">00</div>
                <div class="font-mono uppercase text-sm sm:text-lg leading-none">Ore</div>
            </div>

            <!-- Minuti -->
            <div class="w-20 sm:w-24 md:w-32 mx-1 sm:mx-2 p-3 sm:p-4 bg-white text-black rounded-lg">
                <div class="font-mono leading-none" x-text="minutes">00</div>
                <div class="font-mono uppercase text-sm sm:text-lg leading-none">Minuti</div>
            </div>

            <!-- Secondi -->
            <div class="w-20 sm:w-24 md:w-32 mx-1 sm:mx-2 p-3 sm:p-4 bg-white text-black rounded-lg">
                <div class="font-mono leading-none" x-text="seconds">00</div>
                <div class="font-mono uppercase text-sm sm:text-lg leading-none">Secondi</div>
            </div>
        </div>

        <!-- Messaggio Finale -->
        <p class="text-sm sm:text-lg text-center mt-4 sm:mt-6">
            *Black Friday termina il 29 Novembre 2024.
        </p>
    </div>
</div>
