import { createWebHistory, createRouter } from "vue-router";
import Pages from "../components/admin/Pages.vue";
import Page from "../components/admin/Page.vue";
import Projects from "../components/admin/Projects";
import Project from "../components/admin/Project.vue";
import Articles from "../components/admin/Articles.vue";
import Article from "../components/admin/Article.vue";
import Home from "../components/admin/Home.vue";
import Sections from "../components/admin/Sections";
import PageInfos from "../components/admin/PageInfos";
import PageBlocks from "../components/admin/PageBlocks";
import SectionEdit from "../components/admin/SectionEdit";
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
  },
  {
    path: "/admin/page/:id",
    name: "page-edit",
    component: Page,
    props: (route) => ({
      id: parseInt(route.params.id),
    }),
    children: [
      {
        path: "",
        name: "page-infos",
        component: PageInfos,
      },
      {
        path: "sections",
        name: "sections",
        component: Sections,
      },
      {
        path: "section/:slug",
        name: "section-edit",
        component: SectionEdit,
        props: (route) => ({
          slug: route.params.slug,
        }),
      },
      {
        path: "blocks",
        name: "page-blocks",
        component: PageBlocks,
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
