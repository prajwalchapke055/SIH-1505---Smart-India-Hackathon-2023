import sched
import sys
import pandas as pd
from sklearn.preprocessing import StandardScaler
from sklearn.svm import SVC
import joblib

def predict_with_svm(model, new_data):
    # Scale the new data using the same scaler used for training data
    new_data_scaled = sched.transform(new_data)

    # Use the loaded SVM model to predict the target variable for the new data
    predicted_y = model.predict(new_data_scaled)

    return predicted_y[0]

# Load the saved model
loaded_model = joblib.load('svm_model.joblib')

# Extract user input data from command-line arguments
csv_data = sys.argv[1]

# Convert CSV data to a DataFrame
user_input = pd.read_csv(pd.compat.StringIO(csv_data))

# Specify the columns assuming they are in the same order as the training data
user_input_features = user_input.iloc[:, 0:6]

# Make predictions for user input data
predicted_value = predict_with_svm(loaded_model, user_input_features)

print(f'Predicted Y: {predicted_value}')
