import { cva, type VariantProps } from 'class-variance-authority';

export { default as Button } from './Button.vue';

export const buttonVariants = cva(
    'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-sm text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-zinc-950 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0',
    {
        variants: {
            variant: {
                default:
                    'bg-zinc-900 text-zinc-50 shadow-sm hover:bg-zinc-900/90',
                destructive:
                 'bg-red-500 text-zinc-50 shadow-sm hover:bg-red-500/90',
                outline:
                    'border border-zinc-200 bg-white shadow-sm hover:bg-zinc-100 hover:text-zinc-900 ',
                secondary:
                    'bg-zinc-100 text-zinc-900 shadow-sm hover:bg-zinc-100/80',
                ghost: 'hover:bg-zinc-100 hover:text-zinc-900  ',
                link: 'text-zinc-900 underline-offset-4 hover:underline ',
            },
            size: {
                default: 'h-9 px-4 py-2',
                xs: 'h-6 text-xs rounded-sm px-2 [&_svg]:size-3',
                sm: 'h-8 rounded-sm px-3 text-xs',
                lg: 'h-10 rounded-sm px-8',
                icon: 'h-9 w-9',
            },
        },
        defaultVariants: {
            variant: 'default',
            size: 'default',
        },
    },
);

export type ButtonVariants = VariantProps<typeof buttonVariants>;
