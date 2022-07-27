import axios from 'axios';
import authHeader from './auth-header';

const API_URL = 'http://localhost:8000/api/animals/';

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
}
export default new AnimalsService();