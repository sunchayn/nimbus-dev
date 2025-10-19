<template>
    <div :class="cn('absolute', props.class)">
        <AppRippleCircle
            v-for="index in numberOfCircles"
            :key="index"
            :opacity="baseCircleOpacity - index * circleOpacityDowngradeRatio"
            :size="baseCircleSize + index * spaceBetweenCircle"
            :animation-delay="index * waveSpeed"
            :border-style="index === numberOfCircles - 1 ? 'dashed' : 'solid'"
            :class="circleClass"
        />
    </div>
</template>

<script setup lang="ts">
import AppRippleCircle from '@/components/ui/ripple/AppRippleCircle.vue';
import {
    HTMLAttributes
} from "vue";
import {
    cn
} from "@/lib/utils";

interface Props {
    baseCircleSize?: number;
    baseCircleOpacity?: number;
    spaceBetweenCircle?: number;
    circleOpacityDowngradeRatio?: number;
    circleClass?: string;
    waveSpeed?: number;
    numberOfCircles?: number;
    class?: HTMLAttributes['class'];
}

const props = withDefaults(defineProps<Props>(), {
    baseCircleSize: 100,
    baseCircleOpacity: 0.24,
    circleOpacityDowngradeRatio: 0.03,
    waveSpeed: 5,
    spaceBetweenCircle: 80,
    numberOfCircles: 5,
    circleClass: '',
    class: '',
});
</script>
