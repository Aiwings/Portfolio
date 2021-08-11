<template>
  <main id="home">
    <section class="hero is-fullheight gradiant is-dark">
      <!-- Home Banner -->
      <div class="hero-head">
        <!-- Banner Header + Nav -->
        <nav-bar></nav-bar>
      </div>
      <div class="hero-body">
        <!-- Banner Body -->
        <h1 class="title">Guillaume Roux</h1>
        <p class="subtitle">Développeur Front-End</p>
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
  </main>
</template>

<script>
import Nav from "./Nav.vue";
export default {
  data() {
    return {
      message: "Hello",
    };
  },
  components: {
    "nav-bar": Nav,
  },
};
</script>

<style lang="scss" src="../scss/home.scss"></style>