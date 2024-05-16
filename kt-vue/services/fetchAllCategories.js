import axios from 'axios';

const apiUrl = `${process.env.API_BASE_URL}api/all-categories`;

export async function fetchAllCategories() {
  try {
    const response = await axios.post(`${apiUrl}`);
    return response.data;
  } catch (error) {
    console.error('Error fetching articles:', error);
    throw error;
  }
}
