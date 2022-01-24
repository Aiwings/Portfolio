<template>
  <editor
    v-model="textcontent"
    :init="init"
  />
</template>

<script>
//Importing TinyMCE Editor
import tinymce from "tinymce/tinymce";
//Importing TinyMCE Vue integration
import Editor from "@tinymce/tinymce-vue";

import "tinymce/themes/silver";
import "tinymce/icons/default";
import "tinymce/skins/ui/oxide-dark/skin.css";
//import "tinymce/skins/content/dark/content.min.css";
//Importing TinyMCE Plugins
import "tinymce/plugins/advlist";
import "tinymce/plugins/autolink";
import "tinymce/plugins/lists";
import "tinymce/plugins/link";
import "tinymce/plugins/image";
import "tinymce/plugins/preview";
import "tinymce/plugins/anchor";
import "tinymce/plugins/searchreplace";
import "tinymce/plugins/visualblocks";
import "tinymce/plugins/code";
import "tinymce/plugins/fullscreen";
import "tinymce/plugins/insertdatetime";
import "tinymce/plugins/media";
import "tinymce/plugins/table";
import "tinymce/plugins/paste";
import "tinymce/plugins/help";
import "tinymce/plugins/wordcount";

export default {
  components: {
    editor: Editor,
  },
  props:{
    content: {
      type:String,
      default:"",
    }
  },
  emits:["update:content"],
  data() {
    return {
      init: {
        height: 500,
        branding: false,
        menubar: true,
        plugins: [
          "advlist autolink lists link image preview anchor",
          "searchreplace visualblocks code fullscreen",
          "insertdatetime media table paste help wordcount",
        ],
        toolbar:
          "undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help",
        skin: false,
        content_css: false,
      },
    };
  },
  computed:{
    textcontent: {
      get(){
        return this.content;
      },
      set(content){
        this.$emit('update:content', content)
      }
    }
  },
};
</script>

<style>
</style>