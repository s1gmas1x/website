<template>
    <section id="four" class="wrapper style3 spotlights">
        <div class="inner d-block pt-4 pb-0 pl-4 mb-0">
            <h2>Blog</h2>
            <p class="mb-0">A collection of articles written by me.</p>
        </div>
        <section v-for="article in articles" v-bind:key="article.id">

            <div class="content py-2">
                <div class="inner">
                    <h2 class="my-1">{{article.title}}</h2>
                    <p class="mb-2">{{article.heading}}</p>
                    <ul class="actions mb-1">
                        <li><a href="#" class="button">Read more</a></li>
                    </ul>
                </div>
            </div>
        </section>
                        <div class="inner py-2 pb-2 m-0">
                        <ul class="actions my-0 d-flex">
                            <li class=""><a href="" @click.prevent="fetchArticles(pagination.prev_page_url)"
                                    v-bind:class="[{disabled: !pagination.prev_page_url}]" class="button small primary ">Previous</a></li>
                            <li><small>Page {{pagination.current_page}} of {{pagination.last_page}}</small></li>
                            <li class=""><a href="" @click.prevent="fetchArticles(pagination.next_page_url)"
                                    v-bind:class="[{disabled: !pagination.next_page_url}]" class="button small primary">Next</a></li>
                        </ul>
</div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                articles: [],
                article: {
                    id: '',
                    user_id: '',
                    category: '',
                    heading: '',
                    title: '',
                    body: '',
                },
                article_id: '',
                pagination: {},
                edit: false
            }
        },

        created() {
            this.fetchArticles();
        },

        methods: {
            fetchArticles(page_url) {
                let vm = this;
                page_url = page_url || '/api/posts'
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.articles = res.data;
                        vm.makePagination(res);

                    })
                    .catch(err => console.log(err));
            },
            makePagination(res) {
                let pagination = {
                    current_page: res.current_page,
                    last_page: res.last_page,
                    next_page_url: res.next_page_url,
                    prev_page_url: res.prev_page_url

                }
                this.pagination = pagination;

            }
        }
    };

</script>
