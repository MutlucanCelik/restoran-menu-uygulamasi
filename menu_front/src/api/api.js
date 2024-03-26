import axios from "axios";

export const BASE_URL = 'https://4636-5-47-161-84.ngrok-free.app/';


export const getCategories = async () => {
  try {
    const response = await axios.get(`${BASE_URL}api/categories`);
    return response.data;
   
  } catch (error) {
    console.error('Kategorileri getirirken hata oluştu:', error);
    throw error;
  }
};

// Yemekleri getiren API isteği
export const getMeals = async (id) => {
  try {
    const response = await axios.get(`${BASE_URL}api/meals/${id}`);
    return response.data;
  } catch (error) {
    console.error('Yemekleri getirirken hata oluştu:', error);
    throw error;
  }
};
export const getMeal = async (id) => {
  try {
    const response = await axios.get(`${BASE_URL}api/meal/${id}`);
    return response.data;
  } catch (error) {
    console.error('Yemek getirirken hata oluştu:', error);
    throw error;
  }
};

export const getCompanyInfo = async () => {
  try {
    const response = await axios.get(`${BASE_URL}/company-info`);
    return response.data;
  } catch (error) {
    console.error('Şirket bilgilerini getirirken hata oluştu:', error);
    throw error;
  }
};
export const getCompanyImage = async () => {
    try {
      const response = await axios.get(`${BASE_URL}api/company-image`);
      return response.data;
    } catch (error) {
      console.error('Şirket bilgilerini getirirken hata oluştu:', error);
      throw error;
    }
  };
