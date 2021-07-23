<?php

class model_main extends Model
{
	public function getData()
	{
		$sql = "SELECT * FROM cities";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	public function setCity($cityName)
	{
		$cityName = trim(strip_tags($cityName)); // Удалим все html и php теги из строки
		/*$cityName = trim($cityName);*/ // Уберем ненужные пробелы по краям
		return $cityName;
		/*if(preg_match("/^[a-zA-Z ]+$/", $countryName))// Проверим введённое значение на наличие только печатных символов и пробелов 
		{
			try //Поймаем ошибку дублирования при помощи исключений
			{
				$stmt = $this->pdo->prepare('INSERT INTO countriestable(countryName) VALUES (:countryName)');// Запишем в бд при помощи подготовленного запроса(для устранения возможных sql-инъекций)
				$stmt->bindParam(':countryName', $countryName);
				$stmt->execute();
			}catch (PDOException $e)
			{
				return "Такая запись уже существует";
			}

			header("Location: ../../");//Направим пользователя на главную страницу для успешного отображения новой страны в БД

		}else
		{
			return "Недопустимое значение";
		}*/
	}
}