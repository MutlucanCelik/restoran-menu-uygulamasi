import React, { useEffect, useState } from 'react'
import { Alert, Button, Image, Pressable, SafeAreaView, StyleSheet, ActivityIndicator, Text, TextInput, View } from 'react-native'
import { BASE_URL } from '../api/api';
import { getCompanyImage } from '../api/api';

// contact me :)
// instagram: must_ait6
// email : mustapha.aitigunaoun@gmail.com

export default function LoginScreen() {
    const [loading, setLoading] = useState(true);
    const [click,setClick] = useState(false);
    const {username,setUsername}=  useState("");
    const {password,setPassword}=  useState("");
    const [logo,setLogo]=  useState("");

    useEffect(() =>{
        const fetchCompanyImage = async () => {
            try {
              const {image} = await getCompanyImage();
              setLogo(image);
              setLoading(false);
            } catch (error) {
              console.error('Şirketin resmini çekerken bir hata oluştu:', error);
              setLoading(false);
            }
          };
          fetchCompanyImage()
    },[])
      if (loading) {
        return (
          <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
            <ActivityIndicator size="large" color="blue" />
          </View>
        );
      }
  return (
    <SafeAreaView style={styles.container}>
        <View style={styles.imageContainer}>
        <Image source={{uri:BASE_URL + logo}} style={styles.image} />
        </View>
        <Text style={styles.title}>Giriş</Text>
        <View style={styles.inputView}>
            <TextInput style={styles.input} placeholder='Email veya kullanıcı adı' value={username} onChangeText={setUsername} autoCorrect={false}
        autoCapitalize='none' />
            <TextInput style={styles.input} placeholder='Şifre' secureTextEntry value={password} onChangeText={setPassword} autoCorrect={false}
        autoCapitalize='none'/>
        </View>
        <View style={styles.rememberView}>
            <View>
                <Pressable onPress={() => Alert.alert("Forget Password!")}>
                    <Text style={styles.forgetText}>Hala kayıt olmadınız mı ?</Text>
                </Pressable>
            </View>
        </View>

        <View style={styles.buttonView}>
            <Pressable style={styles.button} onPress={() => Alert.alert("Login Successfuly!","see you in my instagram if you have questions : must_ait6")}>
                <Text style={styles.buttonText}>Giriş</Text>
            </Pressable>
        </View>

        
    </SafeAreaView>
  )
}


const styles = StyleSheet.create({
  container : {
    alignItems : "center",
    paddingTop: 70,
  },
  imageContainer:{
    borderRadius:100,
    shadowColor: '#000',
    shadowOffset: {
      width: 0,
      height: 2,
    },
    shadowOpacity: 0.25,
    shadowRadius: 2.84,
    elevation: 5,
  },
  image : {
    width: 200,
    height: 200,
    borderRadius:100,
    resizeMode:'cover'
  },
  title : {
    fontSize : 30,
    fontWeight : "bold",
    textTransform : "uppercase",
    textAlign: "center",
    paddingVertical : 40,
    color : "#14213d"
  },
  inputView : {
    gap : 15,
    width : "100%",
    paddingHorizontal : 40,

  },
  input : {
    height : 50,
    paddingHorizontal : 20,
    borderColor : "#333",
    borderWidth : 1,
    borderRadius: 7
  },
  rememberView : {
    width : "100%",
    paddingHorizontal : 50,
    justifyContent:'flex-end',
    alignItems : "center",
    flexDirection : "row",
    marginVertical:15,
  },
  rememberText : {
    fontSize: 13
  },
  forgetText : {
    fontSize : 11,
    color : "blue"
  },
  button : {
    backgroundColor : "#ef233c",
    height : 45,
    borderColor : "#ddd",
    borderWidth  : 1,
    borderRadius : 5,
    alignItems : "center",
    justifyContent : "center"
  },
  buttonText : {
    color : "white"  ,
    fontSize: 18,
    fontWeight : "bold"
  }, 
  buttonView :{
    width :"100%",
    paddingHorizontal : 50
  },
  optionsText : {
    textAlign : "center",
    paddingVertical : 10,
    color : "gray",
    fontSize : 13,
    marginBottom : 6
  },
  mediaIcons : {
    flexDirection : "row",
    gap : 15,
    alignItems: "center",
    justifyContent : "center",
    marginBottom : 23
  },
  footerText : {
    textAlign: "center",
    color : "gray",
  },
})