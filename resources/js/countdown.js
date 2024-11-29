export default function countdown() {
    return {
        seconds: '00',
        minutes: '00',
        hours: '00',
        days: '00',
        distance: 0,
        countdown: null,
        targetDate: new Date('November 31, 2024 00:00:00').getTime(),
        now: new Date().getTime(),
        start() {
            this.countdown = setInterval(() => {
                // Calcola il tempo rimanente
                this.now = new Date().getTime();
                this.distance = this.targetDate - this.now;

                // Aggiorna i valori
                this.days = this.padNum(Math.floor(this.distance / (1000 * 60 * 60 * 24)));
                this.hours = this.padNum(Math.floor((this.distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
                this.minutes = this.padNum(Math.floor((this.distance % (1000 * 60 * 60)) / (1000 * 60)));
                this.seconds = this.padNum(Math.floor((this.distance % (1000 * 60)) / 1000));

                // Se il countdown termina
                if (this.distance < 0) {
                    clearInterval(this.countdown);
                    this.days = '00';
                    this.hours = '00';
                    this.minutes = '00';
                    this.seconds = '00';
                }
            }, 1000); // Aggiorna ogni secondo
        },
        padNum(num) {
            return num.toString().padStart(2, '0'); // Formatta il numero con 2 cifre
        }
    }
}
