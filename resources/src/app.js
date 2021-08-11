import { createApp } from "vue";
import SvgVue from "svg-vue3";
import Home from "./components/Home.vue";

const app = createApp({
    components: {
        Home,
    },
});
app.use(SvgVue);
app.mount("#app");
