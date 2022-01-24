<template>
  <panel
    :title="page.title"
    :tabs="tabs"
    :active-tab="active"
    :has-prev="true"
    @change-tab="tabChange"
    @prev-clicked="prev"
  >
    <page-infos
      v-if="active == 0"
      :page="page"
      @page-changed="pageChanged"
    />
    <router-view v-else />
  </panel>
</template>

<script>
import PanelBox from "../PanelBox.vue";
import PageInfos from "./PageInfos.vue";
import Ajax from "@/ajax";
export default {
  components: {
    panel: PanelBox,
    "page-infos": PageInfos,
  },
  props: {
    id: {
      type: Number,
      default: 0,
    },
  },
  data() {
    return {
      page: {
        slug: "",
        description: "",
        title: "test",
      },
      active: 0,
      tabs: [
        {
          id: 0,
          text: "Informations",
          to: `/admin/page/${this.id}/`,
        },
        {
          id: 1,
          text: "Sections",
          to: `/admin/page/${this.id}/sections`,
        },
        {
          id: 2,
          text: "Blocks",
          to: `/admin/page/${this.id}/blocks`,
        },
      ],
    };
  },
  computed: {},
  async created() {
    if (this.id === 0) {
      return;
    }
    const jsonpage = this.$route.params["page"];
    if (jsonpage) {
      this.page = JSON.parse(jsonpage);
    } else {
      try {
        const ajax = new Ajax();
        let resp = await ajax.request(`/api/page/${this.id}`);
        this.page = resp;
      } catch (err) {
        console.error(err.message);
      }
    }
  },
  methods: {
    tabChange(tabId) {
      this.active = tabId;
    },
    async pageChanged(editedPage) {
      console.log("pageChange page");
      this.page = editedPage;
      const ajax = new Ajax(true);
      let url = this.id === 0 ? `/api/pages` : `/api/page/${this.id}`;
      let method = this.id === 0 ? `POST` : `PUT`;
      try {
        let req = await ajax.request(url, method, editedPage);
        console.log(req);
      } catch (err) {
        alert(err.message);
      }
    },
    prev() {
      this.$router.replace({
        name: "pages",
      });
    },
  },
};
</script>

<style>
.panel {
  margin-top: 100px;
}
</style>
