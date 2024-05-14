import axios from 'axios';

const url = "http://localhost:3000/competitions";
function getCompetitions() {
    return axios.get(url);
}
function updateCompetition(competition) {
    return axios.put(`${url}/${competition.id}`, competition);
}
export { getCompetitions, updateCompetition };