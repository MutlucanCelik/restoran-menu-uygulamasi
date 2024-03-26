import { View, Text, FlatList, ActivityIndicator, Image, StyleSheet } from 'react-native';
import React, { useEffect, useState } from 'react';
import { getMeal } from '../api/api';
import { BASE_URL } from '../api/api';

export default function MealDetailScreen({route,navigation}) {
  const mealId = route.params.mealId;
  const mealName = route.params.mealName;

  useEffect(()=>{
    navigation.setOptions({title:mealName})
  },[navigation,mealId])


  const [loading, setLoading] = useState(true);
  const [meal, setMeal] = useState({});

  useEffect(() => {
    const fetchMeal = async () => {
      try {
        const fetchedMeal = await getMeal(mealId);
   
        setMeal(fetchedMeal[0]);
        setLoading(false);
      } catch (error) {
        console.error('Yemekler çekerken bir hata oluştu:', error);
        setLoading(false);
      }
    };

    fetchMeal();
  }, []);

  if (loading) {
    return (
      <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
        <ActivityIndicator size="large" color="blue" />
      </View>
    );
  }
  return (
    <View style={styles.card}>
      <Image
            style={styles.image}
            source={{ uri: BASE_URL + meal.image }} // item.image burada kategorinin resminin URL'sini içerir
            />
            <Text style={styles.mealName}>{meal.name}</Text>
            <Text style={styles.mealDescription}>{meal.description}</Text>
            <Text style={styles.mealPrice}>Fiyat: ₺{meal.price}</Text>
    </View>
  )
}

const styles = StyleSheet.create({
  card:{
    padding:20,
    
  },
  image: {
    width: '100%',
    height: 250,
    borderRadius: 10,
    shadowColor: '#000',
    shadowOpacity: 0.25,
    shadowOffset: { width: 0, height: 2 },
    shadowRadius: 5,
    marginBottom: 30,
    resizeMode: 'cover',
  },

  mealName:{
    fontSize:30,
    fontWeight:'bold',
    marginBottom:10,
    letterSpacing:1
  },

  mealDescription:{
    fontSize: 17,
    letterSpacing:1,
  },
  mealPrice:{
    marginTop:10,
    fontSize: 17,
    letterSpacing:1
  }
  

});