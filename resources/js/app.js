import './bootstrap';

import Alpine from 'alpinejs';
import lottie from 'lottie-web';
import { defineElement } from '@lordicon/element';


window.Alpine = Alpine;

Alpine.start();

defineElement(lottie.loadAnimation);
