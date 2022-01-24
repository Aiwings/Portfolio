import { createApp } from "vue";
import SvgVue from "svg-vue3";
import HomePage from "./components/HomePage.vue";

const app = createApp({
    components: {
        "home-page": HomePage,
    },
});
app.use(SvgVue);
app.mount("#app");
