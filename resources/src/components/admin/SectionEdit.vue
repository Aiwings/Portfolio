<template>
  <!-- Page to Edit Sections With TinyMCE Editor
TODO Handle Images -->
  <div class="container">
    <div class="heading is-flex">
      <a
        href=""
        class="is-primary"
        @click="backtoList()"
      >
        <svg-vue
          class="iconsvg arrow-left"
          icon="arrow-left"
        />
        Revenir à la liste
      </a>
      <p>Edition de la section {{ slug }}</p>
    </div>
    <form @submit.prevent="onSubmit">
      <FormField
        v-model="editedSlug"
        type="text"
        name="slug"
        title="Nom de la section (slug)"
      />
      <FormField
        v-model="title"
        type="text"
        name="title"
        title="Nom de la section"
      />
      <label class="label">Contenu de la Section</label>
      <TextEdit v-model:content="content" />
      <div class="submit is-flex is-justify-content-center">
        <button
          class="button is-medium is-primary is-outlined is-centered"
          type="submit"
        >
          Soumettre les changements
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import FormField from "../FormField";
import TextEdit from "../TextEdit.vue";
import Ajax from "@/ajax";
export default {
  components: {
    FormField,
    TextEdit,
  },
  props: {
    slug: {
      type: String,
      default: "new",
    },
  },
  data() {
    return {
      id: 0,
      title: "",
      content: "",
      editedSlug: "",
    };
  },
  async created() {
    console.log(this.slug);
    if (this.slug === "new") {
      return;
    }
    this.editedSlug = this.slug;
    const ajax = new Ajax();
    try {
      let req = await ajax.request(`/api/section/${this.slug}`);
      this.id = req.id;
      this.title = req.title;
      this.content = req.content;
    } catch (error) {
      console.error(error);
    }
  },
  methods: {
    async onSubmit() {
      const ajax = new Ajax(true);
      let method = this.slug === "new" ? "POST" : "PUT";
      let url =
        this.slug === "new" ? "/api/sections" : `/api/section/${this.id}`;
      try {
        let req = await ajax.request(url, method, {
          slug: this.editedSlug,
          title: this.title,
          content: this.content,
          page_ID: parseInt(this.$route.params.id),
        });
        console.log(req);
      } catch (error) {
        console.error(error);
      }
    },
    backtoList: function () {
      this.$router.replace({
        name: "sections",
      });
    },
  },
};
</script>

<style lang="scss">
.heading {
  padding: 5px 3px;
  p {
    margin: 0 auto;
  }
}
</style>