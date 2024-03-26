import { View, Text, FlatList, ActivityIndicator, Image, StyleSheet } from 'react-native';
import React, { useEffect, useState } from 'react';
import { getMeals } from '../api/api';
import MealGrid from '../components/MealGrid';

export default function MealsScreen({navigation,route}) {
    const categoryId = route.params.categoryId;
    const categoryName = route.params.categoryName;

    useEffect(()=>{
        navigation.setOptions({title:categoryName})
      },[navigation,categoryId])
    

    const [loading, setLoading] = useState(true);
    const [meals, setMeals] = useState([]);
  
    useEffect(() => {
      const fetchMeals = async () => {
        try {
          const fetchedMeals = await getMeals(categoryId);
          setMeals(fetchedMeals);
          setLoading(false);
        } catch (error) {
          console.error('Yemekler çekerken bir hata oluştu:', error);
          setLoading(false);
        }
      };
  
      fetchMeals();
    }, []);
  
    function rederMealItem(meal){
      function pressHandler(){
        navigation.navigate('Yemek Detay',{
          mealId:meal.item.id,
          mealName: meal.item.name
        })
      }
      return <MealGrid item={meal.item} pressMeal={pressHandler}/>
    }
  
    if (loading) {
      return (
        <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
          <ActivityIndicator size="large" color="blue" />
        </View>
      );
    }
  
  return (
    <View style={{ flex: 1, paddingVertical: 30,paddingHorizontal:10}}>
      <FlatList
        data={meals}
        keyExtractor={(item) => item.id.toString()}
        numColumns={2} // Satırda 2 kart göstermek için
        renderItem={rederMealItem}
      />
    </View>
  )
}

const styles = StyleSheet.create({})