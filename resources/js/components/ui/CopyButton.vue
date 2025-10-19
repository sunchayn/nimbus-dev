<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { CheckIcon, CopyIcon } from 'lucide-vue-next';

interface CopyButtonProps {
    onClick: () => void;
    copied: boolean;
}

defineProps<CopyButtonProps>();
</script>

<template>
    <Button size="xs" variant="ghost" class="size-6" @click="onClick">
        <CopyIcon v-if="!copied" class="size-3" />
        <CheckIcon v-else class="size-3 text-green-800" />
    </Button>
</template>
