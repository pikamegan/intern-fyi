<?php
class CompanyDAO
{
    // 1. get all company
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
    // 2. TO BE DONE update ratings of company upon new review
}
