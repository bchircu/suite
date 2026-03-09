import './film-age-toggle.scss';
import Component from 'ShopUi/models/component';

export default class FilmAgeToggle extends Component {
    protected dateDisplay: HTMLElement;
    protected toggleButton: HTMLButtonElement;
    protected releaseDate: string;
    protected originalDate: string;
    protected isShowingAge: boolean = false;

    protected readyCallback(): void {
        this.dateDisplay = <HTMLElement>this.getElementsByClassName(`${this.name}__date-display`)[0];
        this.toggleButton = <HTMLButtonElement>this.getElementsByClassName(`${this.name}__toggle-button`)[0];
        this.releaseDate = this.dataset.releaseDate;
        this.originalDate = this.dateDisplay.textContent.trim();
        
        this.mapEvents();
    }

    protected mapEvents(): void {
        this.toggleButton.addEventListener('click', () => this.onToggleClick());
    }

    protected onToggleClick(): void {
        if (this.isShowingAge) {
            // Show original date
            this.dateDisplay.textContent = this.originalDate;
            this.isShowingAge = false;
        } else {
            // Calculate and show age
            const age = this.calculateAge(this.releaseDate);
            this.dateDisplay.textContent = age;
            this.isShowingAge = true;
        }
    }

    protected calculateAge(releaseDate: string): string {
        const release = new Date(releaseDate);
        const now = new Date();
        const diffTime = Math.abs(now.getTime() - release.getTime());
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        
        const years = Math.floor(diffDays / 365);
        const months = Math.floor((diffDays % 365) / 30);
        const days = diffDays % 30;
        
        const parts = [];
        if (years > 0) {
            parts.push(`${years} year${years !== 1 ? 's' : ''}`);
        }
        if (months > 0) {
            parts.push(`${months} month${months !== 1 ? 's' : ''}`);
        }
        if (days > 0 && years === 0) {
            parts.push(`${days} day${days !== 1 ? 's' : ''}`);
        }
        
        return parts.length > 0 ? parts.join(', ') + ' old' : 'Released today';
    }
}
