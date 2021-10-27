<?php
class CompanyDAO
{

    // 1. TO BE DONE update ratings of company upon new review


    // 2. get all company
    public function retrieveAll()
    {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection();

        $sql = "select * from company";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $allCompanies = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            $allCompanies[] = new Company(
                $row["companyID"],
                $row["companyName"],
                $row["companyDescription"],
                $row["companyLinkedinLink"],
                $row["companyWebsite"],
                $row["industry"],
                $row["imageLink"],
                $row["location"],
                $row["numberOfClicks"],
                $row["totalNumReviews"],
                $row["overallRating"],
                $row["averageCriteria1"],
                $row["averageCriteria2"],
                $row["averageCriteria3"],
                $row["averageCriteria4"],
                $row["averageCriteria5"],
                $row["averageCriteria6"]
            );
        }

        $stmt = null;
        $pdo = null;
        return $allCompanies;
    }

    // 3. search within companyName and companyDescription
    public function retrieveSearchedCompanies($searchQuery)
    {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection();

        $searchQuery = '%' . $searchQuery . '%';

        $sql = "SELECT * FROM company WHERE companyName LIKE :query UNION SELECT * FROM company WHERE industry LIKE :query";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":query", $searchQuery, PDO::PARAM_STR);
        $stmt->execute();

        $searchedCompanies = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            $searchedCompanies[] = new Company(
                $row["companyID"],
                $row["companyName"],
                $row["companyDescription"],
                $row["companyLinkedinLink"],
                $row["companyWebsite"],
                $row["industry"],
                $row["imageLink"],
                $row["location"],
                $row["numberOfClicks"],
                $row["totalNumReviews"],
                $row["overallRating"],
                $row["averageCriteria1"],
                $row["averageCriteria2"],
                $row["averageCriteria3"],
                $row["averageCriteria4"],
                $row["averageCriteria5"],
                $row["averageCriteria6"]
            );
        }

        $stmt = null;
        $pdo = null;
        return $searchedCompanies;
    }
}
