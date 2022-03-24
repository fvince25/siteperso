import {Chart, registerables} from 'chart.js';
Chart.register(...registerables);

export default class ConfigChart {

    config;
    element;

    constructor(element) {

        this.element = element;

        const options = {
            hover: {mode: null},
            events: []
        }

        let valuePourcent = parseInt(element.getAttribute("data-value"));

        const data = {
            datasets: [{
                data: [valuePourcent, 100 - valuePourcent],
                backgroundColor: [
                    'rgba(90,90,' + parseInt(2.55 * valuePourcent) +')',
                    '#ddd'
                ],
                hoverOffset: 4,
                circumference: 180,
                cutout: 45,
                rotation: -90,
                hover: {mode: null},

            }]
        };

        this.config = {
            type: 'doughnut',
            data: data,
            options: options
        };
    }

    /**
     * Génère le canvas
     */
    generate() {
        new Chart(
            this.element,
            this.config
        );
    }

}
