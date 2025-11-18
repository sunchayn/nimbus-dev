<script setup lang="ts">
import { cn } from '@/lib/utils';
import { useTimeAgo } from '@vueuse/core';
import { PrimitiveProps } from 'reka-ui';
import { computed, HTMLAttributes } from 'vue';
import ResponseStatusCode from './ResponseStatusCode.vue';

/*
 * Types & interfaces.
 */

interface ResponseStatusProps extends PrimitiveProps {
    class?: HTMLAttributes['class'];
    timestamp: number;
    duration: string;
    size: string;
}

/*
 * Props.
 */

const props = defineProps<ResponseStatusProps>();
</script>

<template>
    <div
        :class="
            cn(
                'h-toolbar relative flex items-center justify-between p-2',
                props.class,
            )
        "
    >
        <div class="flex w-full items-center justify-between gap-1">
            <div class="flex items-center space-x-2">
                <ResponseStatusCode />
            </div>
        </div>
    </div>
</template>
