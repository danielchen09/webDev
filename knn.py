import numpy as np
from sklearn import datasets
from collections import Counter

def distance(instance1, instance2):
	instance1 = np.array(instance1)
	instance2 = np.array(instance2)
	return np.linalg.norm(instance1 - instance2)

def get_neighbors(training_set, labels, test_instance, k, distance = distance):
	distances = []
	for i in range(len(training_set)):
		distances.append((training_set[i], distance(test_instance, training_set[i]), labels[i]))
	distances.sort(key = lambda x:x[1])
	return distances[:k]

def vote(neighbors):
	class_counter = Counter()
	for neighbor in neighbors:
		class_counter[neighbor[2]] += 1
	return class_counter.most_common(1)[0][0]

def vote_prob(neighbors):
	class_counter = Counter()
	for neighbor in neighbors:
		class_counter[neighbor[2]] += 1
	labels, votes = zip(*class_counter.most_common())
	top = class_counter.most_common(1)[0][0]
	top_vote = class_counter.most_common(1)[0][1]
	return top, top_vote/sum(votes)

def vote_harmonic_weights(neighbors):
	class_counter = Counter()
	for i in range(len(neighbors)):
		class_counter[neighbors[i][2]] = 1/(i+1)
	labels, votes = zip(*class_counter.most_common())
	top = class_counter.most_common(1)[0][0]
	top_vote = class_counter.most_common(1)[0][1]
	return top, top_vote/sum(votes)

def vote_distance_weight(neighbors):
	class_counter = Counter()
	for i in range(len(neighbors)):
		class_counter[neighbors[i][2]] = 1/((neighbors[i][1])**2+1)
	labels, votes = zip(*class_counter.most_common())
	top = class_counter.most_common(1)[0][0]
	top_vote = class_counter.most_common(1)[0][1]
	return top, top_vote/sum(votes)



iris = datasets.load_iris()
iris_data = iris.data
iris_label = iris.target

np.random.seed(42)
indices = np.random.permutation(len(iris_data))
n_training_sample = 12
learnset_data = iris_data[indices[:-n_training_sample]]
learnset_label = iris_label[indices[:-n_training_sample]]
testset_data = iris_data[indices[-n_training_sample:]]
testset_label = iris_label[indices[-n_training_sample:]]

k = 6

print("\n--------------------------------------------------------vote---------------------------------------------------------------\n")

for i in range(len(testset_data)):
	neighbors = get_neighbors(learnset_data, learnset_label, testset_data[i], k)
	print("index: %s, vote result: %s, label: %s, data:%s"%(i, vote(neighbors), testset_label[i], testset_data[i]))

print("\n--------------------------------------------------------vote_prob----------------------------------------------------------\n")

for i in range(len(testset_data)):
	neighbors = get_neighbors(learnset_data, learnset_label, testset_data[i], k)
	print("index: %s, vote result: %s, label: %s, data:%s"%(i, vote_prob(neighbors), testset_label[i], testset_data[i]))

print("\n--------------------------------------------------------vote_harmonic_weights----------------------------------------------\n")

for i in range(len(testset_data)):
	neighbors = get_neighbors(learnset_data, learnset_label, testset_data[i], k)
	print("index: %s, vote result: %s, label: %s, data:%s"%(i, vote_harmonic_weights(neighbors), testset_label[i], testset_data[i]))

print("\n--------------------------------------------------------vote_distance_weight-----------------------------------------------\n")

for i in range(len(testset_data)):
	neighbors = get_neighbors(learnset_data, learnset_label, testset_data[i], k)
	print("index: %s, vote result: %s, label: %s, data:%s"%(i, vote_distance_weight(neighbors), testset_label[i], testset_data[i]))

