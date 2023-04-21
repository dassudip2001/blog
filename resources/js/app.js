import './bootstrap';
import {
    Carousel,
    initTE,
} from "tw-elements";

initTE({ Carousel });

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
