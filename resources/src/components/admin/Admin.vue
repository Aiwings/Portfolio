/<template>
  <nav-admin
    @showLogin="loginShown = true"
    @showSignUp="signupShown = true"
    :isConnected="isConnected"
  ></nav-admin>
  <Login
    v-if="loginShown"
    @login-close="loginShown = false"
    @connected="onLogin"
  ></Login>
  <Signin v-if="signupShown" @signup-close="signupShown = false"></Signin>
  <div class="container top-navbar">
    <router-view></router-view>
  </div>
</template>

<script>
import Ajax from "@/ajax";
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
      isConnected: false,
    };
  },
  created() {
    let cookie = Ajax.getCookie("token");
    console.log(cookie);
    this.isConnected = cookie !== undefined;
  },

  methods: {
    onLogin() {
      this.isConnected = true;
      this.loginShown = false;
    },
  },
};
</script>

<style>
.top-navbar {
  margin-top: 50px;
}
</style>