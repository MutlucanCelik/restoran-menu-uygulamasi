import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View } from 'react-native';
import CategoriesScreen from './src/screens/CategoriesScreen';
import MealsScreen from './src/screens/MealsScreen';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import MealDetailScreen from './src/screens/MealDetailScreen';
import LoginScreen from './src/screens/LoginScreen';
import { createDrawerNavigator } from '@react-navigation/drawer';
import MessageScreen from './src/screens/MessageScreen';


const Stack = createNativeStackNavigator();
const Drawer = createDrawerNavigator();

function DrawerNavigsator(){
  return (
    <Drawer.Navigator
    screenOptions={{
      headerStyle:{backgroundColor:'#9e2a2b'},
      headerTintColor:'#fff',
      contentStyle:{backgroundColor:'#edf2fb'}
  }}>
      <Drawer.Screen name="Kategoriler" component={CategoriesScreen} />
      <Drawer.Screen name="Mesaj Gönder" component={MessageScreen} />
    </Drawer.Navigator>
  );
}

export default function App() {
  return (
    <NavigationContainer>
      <Stack.Navigator
      screenOptions={{
        headerStyle:{backgroundColor:'#9e2a2b'},
        headerTintColor:'#fff',
        contentStyle:{backgroundColor:'#edf2fb'}
    }}
      >
         <Stack.Screen name="Login" options={{title:'Giriş'}} component={LoginScreen} />
        <Stack.Screen name="Draver" component={DrawerNavigsator}
          options={{
            headerShown:false}}
        />
        <Stack.Screen name="Yemekler" component={MealsScreen} />
        <Stack.Screen name="Yemek Detay" component={MealDetailScreen} />
      </Stack.Navigator>
    </NavigationContainer>
  );
}


const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
});
