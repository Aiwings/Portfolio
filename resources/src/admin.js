import { createApp } from "vue";

import SvgVue from "svg-vue3";
import AdminPage from "./components/admin/AdminPage.vue";
import router from "./router";

const app = createApp({
  components: {
    "admin-page":AdminPage,
  },
});
app.use(router);
app.use(SvgVue);
app.mount("#app");
