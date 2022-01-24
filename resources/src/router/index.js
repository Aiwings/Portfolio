import { createWebHistory, createRouter } from "vue-router";
import PageList from "../components/admin/PageList.vue";
import PageMain from "../components/admin/PageMain.vue";
import ProjectList from "../components/admin/ProjectList";
import ProjectEdit from "../components/admin/ProjectEdit.vue";
import ArticleList from "../components/admin/ArticleList.vue";
import ArticleEdit from "../components/admin/ArticleEdit.vue";
import HomePage from "../components/admin/HomePage.vue";
import SectionList from "../components/admin/SectionList";
import PageInfos from "../components/admin/PageInfos";
import PageBlocks from "../components/admin/PageBlocks";
import SectionEdit from "../components/admin/SectionEdit";
const routes = [
  { path: "/admin", name: "admin-HomePage", component: HomePage },
  {
    path: "/admin/blogs",
    name: "articles",
    component: ArticleList,
    children: [
      {
        path: ":name",
        name: "article-edit",
        component: ArticleEdit,
      },
    ],
  },
  {
    path: "/admin/pages",
    name: "pages",
    component: PageList,
  },
  {
    path: "/admin/page/:id",
    name: "page-edit",
    component: PageMain,
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
        component: SectionList,
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
    component: ProjectList,
    children: [
      {
        path: ":name",
        name: "project-edit",
        component: ProjectEdit,
      },
    ],
  },
];
const router = createRouter({
  history: createWebHistory(),
  routes,
});
export default router;
