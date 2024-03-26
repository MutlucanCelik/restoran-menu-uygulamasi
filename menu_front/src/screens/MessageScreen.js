import React, { useState, useEffect } from 'react';
import { View, Text, TextInput, Button, Alert, StyleSheet } from 'react-native';
import axios from 'axios';
import { Picker } from '@react-native-picker/picker';
import { BASE_URL } from '../api/api';

const MessageScreen = () => {
  const [message, setMessage] = useState('');
  const [selectedOption, setSelectedOption] = useState('');
  const [options, setOptions] = useState([]);

  useEffect(() => {
    // API'den option verilerini almak için bir istek yap
    const fetchOptions = async () => {
      try {
        const response = await axios.get(`${BASE_URL}api/topics`);
        setOptions(response.data);
      } catch (error) {
        console.error('Error fetching options:', error);
        Alert.alert('Error', 'An error occurred while fetching options.');
      }
    };

    fetchOptions();
  }, []);

  const sendMessage = async () => {
    try {
      const response = await axios.post(`${BASE_URL}api/send-message`, {
        user_id: '4',
        message: message,
        topic_id: selectedOption
      });
      
      if (response.data.message == 'success') {
        setMessage('');
        setSelectedOption('')
        Alert.alert('Tebrikler', 'Mesajını Başarıyla gönderildi.');
      } else {
        Alert.alert('Hata', 'Beklenmedik bir sorun oluştu');
      }
    } catch (error) {
      console.error('Error sending message:', error);
      Alert.alert('Error', 'An error occurred while sending the message.');
    }
  };

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Yetkiliye Mesaj Gönder</Text>
      <View style={styles.fieldContainer}>
        <Text style={styles.label}>Konu</Text>
        <View style={styles.pickerContainer}>
            <Picker
            style={styles.picker}
            selectedValue={selectedOption}
            onValueChange={(itemValue, itemIndex) =>
                setSelectedOption(itemValue)
            }>
            <Picker.Item label='Seçim yapın' value='' />
            {options.map((option, index) => (
                <Picker.Item key={index} label={option.name} value={option.id} />
            ))}
        </Picker>
        </View>
      </View>
      <View style={styles.fieldContainer}>
        <Text style={styles.label}>Mesaj</Text>
        <TextInput
          style={styles.input}
          placeholder="Mesajınız..."
          multiline
          onChangeText={text => setMessage(text)}
          value={message}
        />
      </View>
      <View style={styles.buttonContainer}>
        <Button
          title="Gönder"
          onPress={sendMessage}
        />
      </View>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent:'center',
    alignItems: 'center',
    paddingHorizontal:40
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    marginBottom: 60,
  },
  fieldContainer: {
    width: '100%',
    marginBottom: 40,
  },
  label: {
    fontSize: 18,
    fontWeight: 'bold',
    marginBottom: 5,
  },
  pickerContainer: {
    height: 50,
    borderWidth: 1,
    borderColor: '#ccc',
    borderRadius: 5,
    overflow: 'hidden',
  },
  picker: {
    width: '100%',
    height: '100%',
  },
  input: {
    height: 100,
    borderWidth: 1,
    borderColor: '#ccc',
    borderRadius: 5,
    padding: 10,
  },
  buttonContainer: {
    width: '100%',
  },
});

export default MessageScreen;