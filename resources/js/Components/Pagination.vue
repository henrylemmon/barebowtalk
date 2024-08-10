<template>
    <nav class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0">
        <div class="-mt-px flex w-0 flex-1">
            <Link :href="props.links.prev"
                  class="inline-flex items-center border-t-2 border-transparent pr-1 pt-4 text-sm font-medium text-gray-600 hover:border-gray-400 hover:text-gray-800"
            >
                <ArrowLongLeftIcon class="mr-3 h-5 w-5 text-gray-600" aria-hidden="true"/>
                Previous
            </Link>
        </div>
        <div class="hidden md:-mt-px md:flex">
            <Link v-for="link in filteredLinks"
                  :href="link.url"
                  class="inline-flex items-center border-t-2 px-4 pt-4 text-sm font-medium"
                  :class="{
                    'border-indigo-500 text-indigo-600': link.active,
                    'border-transparent text-gray-600 hover:text-gray-800 hover:border-gray-400': !link.active
                }"
            >
                {{ link.label }}
            </Link>
        </div>
        <div class="-mt-px flex w-0 flex-1 justify-end">
            <Link :href="props.links.next"
                  class="inline-flex items-center border-t-2 border-transparent pl-1 pt-4 text-sm font-medium text-gray-600 hover:border-gray-400 hover:text-gray-800"
            >
                Next
                <ArrowLongRightIcon class="ml-3 h-5 w-5 text-gray-600" aria-hidden="true"/>
            </Link>
        </div>
    </nav>
</template>

<script setup>
import {ArrowLongLeftIcon, ArrowLongRightIcon} from '@heroicons/vue/20/solid'
import {Link} from "@inertiajs/vue3";

const props = defineProps([
    'meta',
    'links'
]);

const filteredLinks = props.meta.links.filter((link) => link.label.length < 10);

console.log(filteredLinks);

</script>
