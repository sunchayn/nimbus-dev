<script lang="ts">
import Logo from '@/components/Logo.vue';
import { Button } from '@/components/ui/button';
import { Head, Link } from '@inertiajs/vue3';

import ResponseStatus from '@/components/ResponseStatus/ResponseStatus.vue';
import CopyButton from '@/components/ui/CopyButton.vue';
import AppPanelRipple from '@/components/ui/ripple/AppPanelRipple.vue';
import { useClipboard } from '@vueuse/core';
import { ExternalLinkIcon, GithubIcon } from 'lucide-vue-next';

export default {
    components: {
        Head,
        Link,
        Logo,
        AppPanelRipple,
        Button,
        CopyButton,
        ResponseStatus,
        ExternalLinkIcon,
        GithubIcon,
    },
    setup() {
        const { copy, copied } = useClipboard();

        const copyInstallCommand = async () => {
            copy('composer require sunchayn/nimbus');
        };

        return {
            copyInstallCommand,
            copied,
        };
    },
};
</script>

<template>
    <Head title="Nimbus - An integrated, in-browser API client for Laravel">
        <meta
            name="description"
            content="Nimbus automatically analyzes your routes and validation rules to build interactive request schemas and a native interface for testing and exploring your APIs."
        />
    </Head>
    <main
        class="relative mx-auto flex min-h-screen w-full max-w-[920px] flex-col overflow-hidden border-x bg-white px-2 md:px-12"
    >
        <header class="w-full">
            <nav class="flex w-full items-center justify-between py-2">
                <Logo class="w-24" />
                <div class="flex items-center space-x-1">
                    <Button
                        as="a"
                        href="https://github.com/sunchayn/nimbus"
                        target="_blank"
                        variant="ghost"
                        size="xs"
                    >
                        <GithubIcon />
                        Github
                    </Button>
                    <Button
                        as="a"
                        href="https://nimbus.sunchayn.io/demo"
                        target="_blank"
                        variant="default"
                        size="xs"
                    >
                        Live Demo
                        <ExternalLinkIcon />
                    </Button>
                </div>
            </nav>
        </header>
        <div class="relative mt-6 flex-1">
            <div class="relative z-10 h-full space-y-4 overflow-y-auto">
                <div>
                    <h2 class="max-w-md text-xl font-medium md:text-2xl">
                        An integrated, in-browser API client for Laravel with a
                        touch of magic
                    </h2>
                    <p class="md:text-md mb-2">
                        Nimbus automatically analyzes your routes and validation
                        rules to build interactive request schemas and a native
                        interface for testing and exploring your APIs.
                    </p>
                </div>

                <div class="md:flex md:space-x-4">
                    <div
                        class="inline-flex items-center space-x-2 rounded border bg-white p-2 font-mono text-xs"
                    >
                        <code class="flex-1">
                            composer require sunchayn/nimbus
                        </code>

                        <CopyButton
                            :on-click="copyInstallCommand"
                            :copied="copied"
                        />
                    </div>

                    <div class="flex-1">
                        <ResponseStatus
                            :timestamp="new Date().getTime() / 1000"
                            duration="200ms"
                            size="200kb"
                        />
                    </div>
                </div>

                <div
                    class="w-full overflow-hidden rounded border bg-gray-100 font-sans"
                >
                    <div
                        class="flex h-6 items-center border-b bg-gray-50 px-3 select-none"
                    >
                        <div class="mr-3 flex space-x-2">
                            <span class="size-2 rounded-full bg-red-300"></span>
                            <span
                                class="size-2 rounded-full bg-yellow-300"
                            ></span>
                            <span
                                class="size-2 rounded-full bg-green-300"
                            ></span>
                        </div>
                        <div
                            class="-ml-10 flex-1 text-center text-xs text-gray-800 md:text-sm"
                        >
                            Nimbus
                        </div>
                    </div>
                    <div>
                        <img
                            src="/nimbus-demo-video.gif"
                            alt="Nimbus Home Page"
                            class="max-w-full min-w-[calc(100%_+_1px)] rounded-md"
                        />
                    </div>
                </div>

                <div>
                    <h3 class="text-md mb-2 font-bold">Wiki Links</h3>
                    <div class="space-y-4 md:flex md:space-y-0 md:space-x-4">
                        <div
                            class="flex-1 rounded border bg-subtle-background px-2 py-2 text-sm"
                        >
                            <div>
                                <h4>User Guide</h4>
                                <small
                                    >Complete guide on using Nimbus's interface,
                                    features, and troubleshooting.</small
                                >
                            </div>
                            <Button
                                as="a"
                                href="https://github.com/sunchayn/nimbus/tree/base/wiki/user-guide"
                                target="_blank"
                                variant="link"
                                size="xs"
                                class="px-0"
                            >
                                Read More
                                <ExternalLinkIcon />
                            </Button>
                        </div>
                        <div
                            class="flex-1 rounded border bg-subtle-background px-2 py-2 text-sm"
                        >
                            <div>
                                <h4>Contributor Guide</h4>
                                <small
                                    >Architecture overview and development
                                    guidelines.</small
                                >
                            </div>
                            <Button
                                as="a"
                                href="https://github.com/sunchayn/nimbus/tree/base/wiki/contribution-guide"
                                target="_blank"
                                variant="link"
                                size="xs"
                                class="px-0"
                            >
                                Read More
                                <ExternalLinkIcon />
                            </Button>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <small class="text-xs text-subtle-foreground"
                        >Built by
                        <a href="https://github.com/sunchayn">@sunchayn</a> -
                        MIT</small
                    >
                </div>
            </div>

            <!--            <AppPanelRipple class="right-0"/>-->
        </div>
    </main>
</template>
