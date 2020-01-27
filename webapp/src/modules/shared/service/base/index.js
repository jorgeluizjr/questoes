import axios from 'axios';

const instance = axios.create({
  baseURL: process.env.VUE_APP_API_HOST,
});

export const getRequest = (path, config = {}) => instance.get(path, config);
