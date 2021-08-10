/<template>
  <nav-admin
    @showLogin="loginShown = true"
    @showSignUp="signupShown = true"
  ></nav-admin>
  <Login v-if="loginShown" @login-close="loginShown = false"></Login>
  <Signin v-if="signupShown" @signup-close="signupShown = false"></Signin>
  <div class="container top-navbar">
    <router-view></router-view>
  </div>
</template>

<script>
import NavAdmin from "./Nav.vue";
import Signin from "./Signin";
import Login from "./Login.vue";
export default {
  components: {
    "nav-admin": NavAdmin,
    Signin,
    Login,
  },
  data() {
    return {
      loginShown: false,
      signupShown: false,
    };
  },
  methods: {},
};
</script>

<style>
.top-navbar {
  margin-top: 100px;
}
</style>