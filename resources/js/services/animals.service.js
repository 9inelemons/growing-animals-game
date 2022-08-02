import axios from 'axios';
import authHeader from './auth-header';

const apiEndpoint = import.meta.env.VITE_API_URL;
const API_URL = `${apiEndpoint}/animals/`;

class AnimalsService {
    kinds() {
        return axios
            .get(API_URL + 'kinds', { headers: authHeader() })
            .then(response => {
                return response.data;
            });
    }
    animals() {
        return axios
            .get(API_URL + 'my', { headers: authHeader() })
            .then(response => {
                return response.data;
            });
    }
    create(animalId) {
        return axios
            .post(API_URL + 'create', {
                animal_id: animalId
            },{ headers: authHeader() })
            .then(response => {
                return response.data;
            });
    }
}
export default new AnimalsService();
