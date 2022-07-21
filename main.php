<?php 
	class Tree{
		private $id;
		private $type;
		private $apples;
		private $pears;
		private $weight;

		public function __construct($id, $type){
			$this->apples = 0;
			$this->$pears = 0;
			$this->$weight = 0;
			$this->id = $id;
			$this->type = $type;
			if ($type == "apple") {
				// Подсчёт яблок с этого дерева
				$this->apples = rand(40,50);
				// Подсчёт веса всех яблок с этого дерева
				for ($i = 0; $i < $this->apples; $i++){
					$this->weight += rand(150,180);
 				}
			}
			else {
				// Подсчёт груш с этого дерева
				$this->pears = rand(0,20);
				// Подсчёт веса всех груш с этого дерева
				for ($i = 0; $i < $this->pears; $i++){
					$this->weight += rand(130,170);
 				}
			}			
		}

		public function	getId(){
			return $this->id;
		}

		public function	getType(){
			return $this->type;
		}

		public function	getApples(){
			return $this->apples;
		}

		public function getPears(){
			return $this->pears;
		}

		public function getWeight(){
			return $this->weight;
		}
	}
	$treeArray = array();
	//Добавление 10 яблонь
	for ($i = 0; $i < 10; $i++){
		$treeArray[] = new Tree(count($treeArray)+1, "apple");
	}

	//Добавление 15 груш
	for ($i = 0; $i < 15; $i++){
		$treeArray[] = new Tree(count($treeArray)+1, "pear");
	}
	//Интерфейс программы
	do {
		$x = readline("Введите значение 0 чтобы добавить дерево, значение 1 чтобы вывести на экран общее количество фруктов, 2 чтобы вывести информацию о деревьях в саду, 3 чтобы узнать вес всех фруктов и 4 чтобы завершить работу программы: "); 
		switch ($x) {
		    case 0:
		    	a:
		    	$type = readline("Введите 1 если яблоня и 2 если груша: ");
		    	if ($type == 1) {
		    		// Добавление яблони в сад
		        	$treeArray[] = new Tree(count($treeArray)+1, "apple");
		    	} elseif ($type == 2) {
		    		// Добавление груши в сад
		    		$treeArray[] = new Tree(count($treeArray)+1, "pear");
		    	} else {
		    		// Если введено не 1 или 2 то просим ввод ещё раз
		    		goto a;
		    	}
		        break;
		    case 1:
		    	// Обнуляем количество фруктов
		    	$sumApple = 0;
				$sumPear = 0;
		        foreach ($treeArray as $tree){
		        	//Подсчёт яблок и груш отдельно
		        	$sumApple += $tree->getApples();
		        	$sumPear += $tree->getPears();
		        }
		        echo 'Яблок: ', $sumApple, "\n", 'Груш: ', $sumPear;
		        break;
		    case 2:		    	
				foreach ($treeArray as $tree) {
					echo "Номер ", $tree->getId(), " - ", $tree->getType(), " ";		
				}
				echo "\n";
				break;
			case 3:
				// Обнуляем счётчик веса
				$weight = 0;
				foreach ($treeArray as $tree){
					//Подсчёт веса
		        	$weight += $tree->getWeight();
		        }
		        echo 'Вес всех фруктов: ', $weight, " грамм или ", $weight/1000 ," килограмм \n";
		        break;
		    case 4:
		        break;
		    default:
		    	echo "\n Вы ввели неверное значение! Попробуйте ещё раз \n";
		    	break;
		}
		echo "\n";
	} while ($x != 4)
?>
