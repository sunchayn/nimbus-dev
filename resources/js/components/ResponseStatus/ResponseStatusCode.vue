<script setup lang="ts">
import AppRoundIndicator from '@/components/round-indicator/AppRoundIndicator.vue';
import { Badge } from '@/components/ui/badge';
</script>

<template>
    <div class="flex items-center space-x-2">
        <AppRoundIndicator class="text-emerald-600" />
        <span class="text-xs text-nowrap">Success</span>
        <Badge variant="outline" class="text-nowrap">200 - Ok</Badge>
    </div>
</template>
