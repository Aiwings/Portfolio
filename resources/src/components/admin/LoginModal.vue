/<template>
  <ModalBox
    title="Connexion"
    @modal-action="login"
    @modal-close="$emit('loginClose')"
  >
    <form @submit.prevent="submit">
      <FormField
        v-model="form.email"
        title="Adresse Email"
        type="email"
        name="email"
        icon="user"
        placeholder="email"
      />
      <FormField
        v-model="form.password"
        title="Mot de passe"
        type="password"
        name="password"
        icon="lock"
        placeholder="mot de passe"
      />
      <div
        v-if="message"
        class="is-warning"
      >
        <div class="message-body">
          {{ message }}
        </div>
      </div>
    </form>
  </ModalBox>
</template>

<script>
import ModalBox from "../ModalBox.vue";
import FormField from "../FormField";
import Ajax from "@/ajax";
export default {
    components: {
        ModalBox,
        FormField,
    },
    emits: ["loginClose", "connected"],
    data() {
        return {
            show: true,
            form: {
                email: "",
                password: "",
            },
            message: "",
        };
    },
    methods: {
        async login() {
            try {
                let ajax = new Ajax();
                const login = await ajax.request(
                    "/api/login",
                    "POST",
                    this.form
                );
                if (login.success) {
                    let cookieString = `token=${login.token};`;
                    cookieString += "samesite=lax;";
                    let maxAge = 7 * 24 * 60 * 60;
                    cookieString += `max-age=${maxAge};`;
                    cookieString += "secure;";
                    document.cookie = cookieString;
                    console.log("logged in", login.token);
                    this.$emit("connected");
                } else {
                    throw new Error();
                }
            } catch (error) {
                console.log(error.message);
                this.message = "La Connexion a échouée";
            }
        },
    },
};
</script>

<style></style>
