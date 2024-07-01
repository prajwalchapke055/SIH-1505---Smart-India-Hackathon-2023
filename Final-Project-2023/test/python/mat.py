import matplotlib.pyplot as plt
import pandas as pd

# Replace this with your actual dataset values
data = {
    'Timestamp': ['2023-01-01 12:00:00', '2023-01-01 12:15:00', '2023-01-01 12:30:00'],
    'MQ-3': [10, 15, 20],
    'MQ-4': [5, 8, 12],
    'MQ-7': [50, 55, 60],
    'MQ-8': [25, 30, 35],
    'MQ-9': [30, 35, 40],
    'MQ-135': [100, 110, 120]
}

# Create a DataFrame from the data
df = pd.DataFrame(data)
df['Timestamp'] = pd.to_datetime(df['Timestamp'])  # Convert Timestamp to datetime

# Plot histograms for each sensor
fig, axes = plt.subplots(nrows=2, ncols=3, figsize=(15, 8))
fig.suptitle('Histograms for MQ Sensors')

# Iterate through each sensor and plot a histogram
for i, sensor in enumerate(['MQ-3', 'MQ-4', 'MQ-7', 'MQ-8', 'MQ-9', 'MQ-135']):
    ax = axes[i // 3, i % 3]
    ax.hist(df[sensor], bins=10, color='skyblue', edgecolor='black')
    ax.set_title(sensor)
    ax.set_xlabel('Sensor Value')
    ax.set_ylabel('Frequency')

# Adjust layout
plt.tight_layout(rect=[0, 0, 1, 0.95])

# Show the plot
plt.show()