import axios from 'axios';
import { eventHub } from '@/event';

const instance = axios.create({
  baseURL: process.env.VUE_APP_API_HOST,
});

export const buildData = function (obj, form, namespace) {
  const fd = form || new FormData();
  let formKey;

  for (const property in obj) {
    if (obj.hasOwnProperty(property)) {
      if (namespace) {
        formKey = `${namespace}[${property}]`;
      } else {
        formKey = property;
      }

      // if the property is an object, but not a File,
      // use recursivity.
      if (typeof obj[property] === 'object' && !(obj[property] instanceof File)) {
        buildData(obj[property], fd, property);
      } else {
        // if it's a string or a File object
        fd.append(formKey, obj[property]);
      }
    }
  }

  return fd;
};

export const getRequest = (path, config = {}) => instance.get(path, config);

export const postRequest = (path, payload) => instance.post(path, payload);

export const putRequest = (path, id, payload) => instance.put(`${path}/${id}`, payload);

export const patchRequest = (path, id, payload) => instance.patch(`${path}/${id}`, payload);

export const deleteRequest = (path, id) => instance.delete(`${path}/${id}`);

export const replaceAll = function (searchString, replaceString, str) {
  return str.split(searchString).join(replaceString);
};
