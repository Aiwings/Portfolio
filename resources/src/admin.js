import { createApp } from "vue";

import SvgVue from "svg-vue3";
import Admin from "./components/admin/Admin.vue";
import router from "./router";

const app = createApp({
  components: {
    Admin,
  },
});
app.use(router);
app.use(SvgVue);
app.mount("#app");
