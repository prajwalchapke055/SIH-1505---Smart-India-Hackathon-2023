import pandas as pd
import matplotlib.pyplot as plt

# Read the CSV file into a DataFrame
file_path = 'finaleone.csv'  # Replace with the actual path to your CSV file
df = pd.read_csv(file_path)

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
