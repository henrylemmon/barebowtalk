<template>
    <AppLayout :title="post.title">
        <Container>
            <h1 class="text-2xl font-bold">{{ post.title }}</h1>

            <span class="block mt-1 text-sm text-gray-600">
                {{ formattedDate }} ago by {{ post.user.name }}
            </span>

            <article class="mt-6">
                <pre class="whitespace-pre-wrap font-sans">
                    {{ post.body }}
                </pre>
            </article>

            <div class="mt-12">
                <h2 class="text-xl font-semibold">Comments</h2>

                <ul class="divide-y mt-4">
                    <li
                        v-for="comment in comments.data"
                        :key="comment.id"
                        class="px-2 py-4"
                    >
                        <span class="text-sm">
                            {{ comment.body}}
                        </span>
                        <span class="block pt-1 text-sm text-gray-600">
                            By {{ comment.user.name }} {{ relativeDate(comment.created_at) }} ago
                        </span>
                    </li>
                </ul>
                <Pagination
                    v-if="props.comments.meta.total > props.comments.meta.per_page"
                    :meta="comments.meta"
                    :links="comments.links"
                />
            </div>
        </Container>
    </AppLayout>
</template>

<script setup>
import {computed} from "vue";
import {Link} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import {relativeDate} from "@/utilities/date.js";
import {formatDistance, parseISO} from "date-fns";
import Container from "@/Components/Container.vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps(['post', 'comments']);

console.log(props.comments.meta)

const formattedDate = computed(() => relativeDate(props.post.created_at));
</script>
