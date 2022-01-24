<template>
  <main id="home">
    <section class="hero is-fullheight gradiant is-dark">
      <!-- Home Banner -->
      <div class="hero-head">
        <!-- Banner Header + NavBar -->
        <nav-bar />
      </div>
      <div class="hero-body">
        <!-- Banner Body -->
        <h1 class="title">
          Guillaume Roux
        </h1>
        <p class="subtitle">
          Développeur Front-End
        </p>
      </div>
      <div class="hero-foot">
        <nav class="tabs is-centered">
          <div class="container">
            <ul>
              <li><a href="">Présentation</a></li>
              <li><a href="">Spécialités</a></li>
              <li><a href="">Compétences</a></li>
              <li><a href="">Réalisations</a></li>
              <li><a href="">Contact</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </section>
    <section-block
      v-for="section in sections"
      :key="section.id" 
      :title="section.title" 
      :content="section.content"
    />
  </main>
</template>

<script>
import NavBar from "./NavBar.vue";
import SectionBlock from './SectionBlock.vue';
export default {
  components: {
    "nav-bar": NavBar,
    "section-block": SectionBlock,
  },
  data() {
    return {
      sections: [{
        id:0,
        title:'',
        content:""
      }],
    };
  },
  created(){
    const sections_json = document.getElementById("sections").textContent;
    this.sections = JSON.parse(sections_json);
  },
  
};
</script>

<style lang="scss" src="../scss/home.scss"></style>
