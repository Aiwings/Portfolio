import { createWebHistory, createRouter } from "vue-router";
import Pages from "../components/admin/Pages.vue";
import Page from "../components/admin/Page.vue";
import Projects from "../components/admin/Projects";
import Project from "../components/admin/Project.vue";
import Articles from "../components/admin/Articles.vue";
import Article from "../components/admin/Article.vue";
import Home from "../components/admin/Home.vue";
const routes = [
    { path: "/admin", name: "admin-home", component: Home },
    {
        path: "/admin/blogs",
        name: "articles",
        component: Articles,
        children: [
            {
                path: ":name",
                name: "article-edit",
                component: Article,
            },
        ],
    },
    {
        path: "/admin/pages",
        name: "pages",
        component: Pages,
        children: [
            {
                path: ":name",
                name: "page-edit",
                component: Page,
                props: true,
            },
        ],
    },
    {
        path: "/admin/projects",
        name: "projects",
        component: Projects,
        children: [
            {
                path: ":name",
                name: "project-edit",
                component: Project,
            },
        ],
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
