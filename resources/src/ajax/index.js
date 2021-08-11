import axios from "axios";
export default class Ajax {
    constructor() {
        this.axios = axios;
        this.axios.defaults.headers.common["X-CSRF-TOKEN"] =
            document.querySelector('meta[name="csrf-token"]').textContent;
    }
    async post(url, data) {
        try {
            let req = await this.axios.post(url, data);
            let json = req.data;
            return json;
        } catch (err) {
            console.log(err.message);
            throw new Error("Erreur lors de la requête");
        }
    }
}
